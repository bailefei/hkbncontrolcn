#!/bin/bash

exit;

# ========== Setting Start ==========

### Release Number
releaseNo=007


### Project Name
project=hkbncontrolcn


### Git Respository
gitRespository=ssh://ken@172.17.5.129/home/developer/project/hkbncontrolcn


### Web Server Settings
webServerHost=172.17.5.114
webServerPort=22
webServerUser=deployer
webServerPass=depo1163c
#webServerPrivateKey=/path/to/private/key/private.key

### Database Server Settings
dbServerHost=${webServerHost}
dbServerPort=${webServerPort}
dbServerUser=${webServerUser}
dbServerPass=${webServerPass}
#dbServerPrivateKey=${webServerPrivateKey}

dbDatabase=${project}
dbUser=hkbncontroluser
dbPass=hkbncontrolpass


### Local Settings
gitDir=git


# ========== Setting End ==========

source deploylib.sh
