#!/bin/sh
NAME=$1
python3 infer.py uploads/$NAME > /tmp/$NAME.txt &
