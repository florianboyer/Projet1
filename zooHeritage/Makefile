CC =g++
CFLAGS =-W -Wall -ansi -pedantic
LDFLAGS=
EXEC =zooRun

all:$(EXEC)

zooRun: animal.o main.o lion.o biche.o
	$(CC) -o zooRun animal.o main.o lion.o biche.o

animal.o: animal.cpp
	$(CC) -o animal.o -c animal.cpp $(CFLAGS)

lion.o: lion.cpp
	$(CC) -o lion.o -c lion.cpp $(CFLAGS)

biche.o: biche.cpp
	$(CC) -o biche.o -c biche.cpp $(CFLAGS)

main.o: main.cpp animal.cpp lion.cpp biche.cpp
	$(CC) -o main.o -c main.cpp $(CFLAGS)

clean:
	rm *.o zooRun

exe : 
	./zooRun
