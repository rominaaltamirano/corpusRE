javac -cp "../lib/json_simple-1.1.jar:../lib/slf4j-api-1.6.2.jar:../lib/slf4j-log4j12-1.6.2.jar:."  $(find /var/www/gruve/WEB-INF/* | grep .java)
