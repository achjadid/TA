import scapy.all as scapy
import mysql.connector
import time
from datetime import datetime
import os
import ftplib
import cv2

gateway_ip = "192.168.0.1/24"
location = "Halaman Depan"

ftp = ftplib.FTP('192.168.0.5')
ftp.login("TugasAkhir","tugasakhir")

def scan(ip):
        arp_packet = scapy.ARP(pdst=ip)
        broadcast_packet = scapy.Ether(dst="ff:ff:ff:ff:ff:ff")
        arp_broadcast_packet = broadcast_packet/arp_packet
        answered_list = scapy.srp(arp_broadcast_packet, timeout=1, verbose=False)[0]
        client_list = []

        for element in answered_list:
            client_dict = {"ip": element[1].psrc, "mac": element[1].hwsrc}
            client_list.append(client_dict)

        return client_list
		
def object_identification(scan_list):
        
        lid_photo = []
        
		#Mengolah hasil Scan MAC Address
        for client in scan_list:
            check_mac = "SELECT * FROM ta_macaddress WHERE m_address = %s"
            mac_addr = (client["mac"],)
            mycursor.execute(check_mac, mac_addr)
            check_result = mycursor.fetchall()
            
            #Cek jika MAC Address terdaftar sebagai Registered MAC Address
            if check_result:
                status_role = "SELECT ta_pengguna.p_id, ta_pengguna.r_id FROM ta_pengguna LEFT JOIN ta_macaddress ON ta_pengguna.p_id = ta_macaddress.p_id WHERE ta_macaddress.m_address = %s"
                mycursor.execute(status_role, mac_addr)
                role_result = mycursor.fetchall()
                
                #Cek jika memiliki role
                if role_result:
                    for row in role_result:
                        pengguna_id = row[0]
                        role_id = row[1]
                
                    #Cek role untuk proses presensi
                    if role_id == 2:
                        p_presensi = (pengguna_id, date_now)
                        q_presensi = "SELECT a_status FROM ta_presensi WHERE p_id = %s AND a_date = %s"
                        mycursor.execute(q_presensi, p_presensi)
                        presensi_result = mycursor.fetchall()
                    
                        #Cek status presensi
                        if presensi_result:
                            for row in presensi_result:
                                s_presensi = row[0]

                            #Jika s_presensi = 0, update s_presensi menjadi 1
                            if s_presensi == '0':
                                u_presensi = "UPDATE ta_presensi SET a_status = '1', a_time = %s WHERE p_id = %s AND a_date = %s"
                                u_status = (time_now, pengguna_id, date_now)
                                mycursor.execute(u_presensi, u_status)
                                mydb.commit()
                                print(client["ip"] + "\t\t" + client["mac"] + "\t\tBerhasil Presensi")
                        
                            #Mengambil waktu terhubung jaringan
							else:
								u_lastconnect = "UPDATE ta_presensi SET a_lastconnect = %s WHERE p_id = %s AND a_date = %s"
								u_lc = (time_now, pengguna_id, date_now)
								mycursor.execute(u_lastconnect, u_lc)
                                mydb.commit()
                                print(client["ip"] + "\t\t" + client["mac"] + "\t\tSudah Presensi")
                
				#Jika tidak memiliki role
                else:
                    print(client["ip"] + "\t\t" + client["mac"] + "\t\tRegistered")

            #Jika tidak terdaftar sebagai Registered MAC Address
            else:
                unidentified = "SELECT u_id FROM ta_unidentified WHERE u_macaddress = %s"
                mycursor.execute(unidentified, mac_addr)
                uresult = mycursor.fetchall()
                
                #Jika MAC Address sudah terdaftar sebagai Unregistered MAC Address
                if uresult:
                    #Mencatat id dari Unregistered MAC Address
                    for row in uresult:
                        log_uid = row[0]
                        
                    print(client["ip"] + "\t\t" + client["mac"] + "\t\tUnidentified")
                 
                #Jika tidak terdaftar sebagai Unregistered MAC Address				 
                else:
                    #Mendaftarkan MAC Address sebagai Unregistered MAC Address
                    insertmac = "INSERT INTO ta_unidentified (u_macaddress) VALUES (%s)"
                    mycursor.execute(insertmac, mac_addr)
                    mydb.commit()
					
                    #Mencatat id dari Unregistered MAC Address  yang baru dibuat
                    log_uid = mycursor.lastrowid
                    
                    insertname = "UPDATE ta_unidentified SET u_name = %s WHERE u_id = %s"
                    uname = "Stranger-{}".format(log_uid)
                    u_val = (uname, log_uid)
                    mycursor.execute(insertname, u_val)
                    mydb.commit()
                    
                    print(client["ip"] + "\t\t" + client["mac"] + "\t\tNew Unidentified")
                    
                #Memasukkan id, waktu, dan lokasi dari Unregistered MAC Address ke tabel ta_log
                insert_log = "INSERT INTO ta_log (u_id, l_date, l_time, l_location) VALUES (%s, %s, %s, %s)"
                log_val = (log_uid, date_now, time_now, location)
                mycursor.execute(insert_log, log_val)
                mydb.commit()
                #Mencatat log id yang baru dibuat
                log_lid = mycursor.lastrowid
                
                #Menambah log id kedalam list untuk insert gambar
                lid_photo.append(log_lid)


        #Mengambil Gambar jika terdapat log_lid pada list lid_photo
        if lid_photo:
            #Memberi nama gambar
            log_photo = datetime_now + ".jpg"
            #Lokasi penyimpanan gambar
            path_photo = "/home/pi/Documents/TA/images/" + log_photo
            #Pengambilan Gambar
            cam = cv2.VideoCapture(0)
            check, frame = cam.read()
            print("taking photo...")
            cv2.imwrite(path_photo,frame)
            print("success")
            cam.release()
			
            #Insert nama gambar ke ta_log
            insert_photo = "UPDATE ta_log set l_photo = %s WHERE l_id = %s"
            x = len(lid_photo)
            for i in range(x):
                lid = lid_photo[i]
                photo_val = (log_photo, lid)
                mycursor.execute(insert_photo, photo_val)
                mydb.commit()

            #Upload gambar ke server
            print("upload photo")
            file = open('/home/pi/Documents/TA/images/' + log_photo,'rb')
            ftp.storbinary('STOR ' + log_photo, file)
            file.close()
            print("success")
			
		print("----------------------------------------------------")

def main():
    result_list = scan(gateway_ip)
    object_identification(result_list)

while True:

    mydb = mysql.connector.connect(
            host="192.168.0.5",
            user="TugasAkhir",
            passwd="root",
            database="db_ta"
        )

    mycursor = mydb.cursor()
    
    now = datetime.now()
	time_now = now.strftime("%H:%M:%S")
	date_now = now.strftime("%Y-%m-%d")
	datetime_now = now.strftime("%Y-%m-%d_%H%M%S")

    main()
	
    time.sleep(15)
