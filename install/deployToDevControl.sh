#!/bin/bash

# ========== Setting Start ==========

### Release Number
###releaseNo=007
releaseNo=001


### Project Name
project=hkbncontrolcn


### Git Respository
###gitRespository=ssh://ken@172.17.5.129/home/developer/project/hkbncontrolcn
###gitRespository=git@github.com:bailefei/hkbncontrolcn.git
###https://github.com/bailefei/hkbncontrolcn.git
###gitRespository=https://git@github.com/bailefei/hkbncontrolcn.git
###gitRespository=git@github.com:bailefei/hkbncontrolcn.git
###gitRespository=https://github.com/bailefei/hkbncontrolcn.git
gitRespository=git@github.com:bailefei/hkbncontrolcn.git

### Web Server Settings
webServerHost=192.168.2.171
webServerPort=22
webServerUser=hkbncontrol
webServerPass=abc123
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
