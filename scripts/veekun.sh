#!/usr/bin/env bash

FULL_PATH=$(realpath "$0")
ROOT_DIR="$(dirname "$FULL_PATH")/.."
TAG="pokedot-veekun/pokedex"

if [[ "$(docker images -q "$TAG" 2> /dev/null)" == "" ]]; then
  docker build --rm -t "$TAG" "${ROOT_DIR}/docker/veekun"
fi


case "$1" in
"load-all")
    shift
    source .env
    docker run --rm -it --network pokedot "$TAG" load --drop-tables -e "mysql+pymysql://$DB_USERNAME:$DB_PASSWORD@$DB_HOST/$DB_DATABASE"
    ;;
*)
    docker run --rm -it --network pokedot "$TAG" "$@"
    ;;
esac
