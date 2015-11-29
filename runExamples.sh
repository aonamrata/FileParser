#!/bin/bash

for filename in examples/*.txt; do
	arguments=$( echo $filename | grep .txt | cut -d'.' -f1 | sed "s/^examples\///")
    cmd="$(echo php scripts/fileParser.php items.csv $arguments)"
    printf "Output of: $cmd is: \n\n"
	OUTPUT="$($cmd)"
	echo "${OUTPUT}"
	printf "\n------------------------------------------\n"
done