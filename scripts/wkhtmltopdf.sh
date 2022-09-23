#!/bin/bash
/usr/bin/xvfb-run -a -w 0 /usr/local/bin/wkhtmltopdf --disable-smart-shrinking "$@"
