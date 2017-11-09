CC =g++
CFLAGS =-W -Wall -ansi -pedantic
LDFLAGS=
EXEC =zooRun

all:$(EXEC)

zooRun: animal.o main.o
	$(CC) -o zooRun animal.o main.o 

animal.o: animal.cpp
	$(CC) -o animal.o -c animal.cpp $(CFLAGS)

main.o: main.cpp animal.cpp 
	$(CC) -o main.o -c main.cpp $(CFLAGS)

clean:
	rm *.o zooRun

exe : 
	./zooRun
