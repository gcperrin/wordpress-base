
#!/bin/bash

proj=msite


POSITIONAL=()
while [[ $# -gt 0 ]]
do
    key="$1"

    case $key in
        -e|--env)
            ENV="$2"
            if [ "$ENV" == "dev" ]  || [ "$ENV" == "stage" ] || [ "$ENV" == "production" ] ; then
                eproj="${proj}_${ENV}"
                docker run --name=$eproj --hostname=$eproj -dt wordpress_base:latest
                exit 0
            else
                echo "Bad environment passed, use dev, stage or production"
                exit 1
            fi
            shift # past argument
            shift # past value
            ;;
        *)    # unknown option
            POSITIONAL+=("$1") # save it in an array for later
            shift # past argument
            ;;
    esac
done

set -- "${POSITIONAL[@]}" # restore positional parameters

echo ENVIRONMENT = "${ENV}"
if [[ -n $1 ]]; then
    echo "Last line of file specified as non-opt/last argument:"
    tail -1 "$1"
fi
