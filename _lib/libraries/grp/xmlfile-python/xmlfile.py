import pymysql
import os
import sys
import time
from os import remove


#time.sleep(2)
idfile=sys.argv[1]    

stmt = "Select filename,fileblob from xml_compras_file where idfile=%s"
conn = pymysql.connect("10.241.153.24","sistemas","Siste99mas","mrjoy_matrix")
cursor = conn.cursor()
val=(idfile)
cursor.execute(stmt,val)
row = cursor.fetchall()
os.system ("clear") 
print("Idle Listo")

for i in row:
    filename= i[0]
    with open(filename, 'wb') as outfile:
        outfile.write(i[1])
        outfile.close()
        fp = "lp "+ filename
        print("Filename Saved as: " + filename)
        #remove(i[0])
    
