#!/bin/bash
#
# deploy to NearlyFreeSpeech
#
scp -i /etc/fileformatnet/nfsnet.pem www/* fileformat_regexplanet-php@ssh.phx.nearlyfreespeech.net:/home/public
