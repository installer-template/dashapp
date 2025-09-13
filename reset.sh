#!/bin/bash

git fetch --all
git reset --hard upstream/main
./setup.sh $1/$2