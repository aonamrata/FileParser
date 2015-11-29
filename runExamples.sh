#!/bin/bash

for filename in examples/*.txt; do
	arguments=$( echo $filename | grep .txt | cut -d'.' -f1 | sed "s/^examples\///")
	cmd="$(echo php scripts/fileParser.php items.csv $arguments)"
	printf "\n------------------------------------------\n"
	printf "Matching Output of: $cmd with autual run resul..\n\n"
	OUTPUT="$($cmd)"
	echo "${OUTPUT}" > "examples/myop2"

	if  diff "${filename}" "examples/myop2" | grep -q ">"  
	then
		echo "DONT MATCH"
	else
		echo "MATCH"
		
	fi
	
	# exit
done