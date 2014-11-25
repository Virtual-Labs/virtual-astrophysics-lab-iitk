DEST=../build

all: init 

#publish config permissions

init:
	(mkdir ${DEST}; rsync -avC AstroWebPages/* ${DEST}/; chmod 777 ${DEST} -R)

clean:
	rm -rf ${DEST}
