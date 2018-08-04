#!/bin/bash

##### CONFIG #####
path='/var/www/ytdl'
url='https://discordapp.com/api/webhooks/472485347968679946/XK1LOVi8_kdD66uDtckVjpogJE-rUsOTcFgsCQZrBCT0WD7VKqurdi4m-YC5mi-Q47r9'
##################

cd $path
cd "data/userfiles"
rm -r *

curl -H "Content-Type: application/json" \
-X POST \
-d '
{
        "username":"VPS#OnDebian",
        "embeds": [{
                "title": "VPS#OnDebian - MARS :",
                "description": "Les fichiers musicaux ont bien été effacé !",
                "color": "4732116"
        }]
}
' ${url}