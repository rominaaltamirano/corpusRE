
f=open("send_continue.php","r")
f2=open("send_continue2.php","w")

f3=open("lista.txt","r")

lista=list()

for e in f3.readlines():
	lista.append(e.strip())
lista.reverse()

print lista

for line in f.readlines():
	if '<img src=".jpg"' in line:
		if lista.__len__()>1:
			line2=line.replace('<img src=".jpg"','<img src="maps/'+lista.pop()+'"')
		else:
			print"problem: "+line
	else:
		line2=line
	f2.write(line2)

f.close()
f2.close()
f3.close()


