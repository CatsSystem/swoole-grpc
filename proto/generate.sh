CURRENT_PATH=`pwd`
PROJECT_PATH=$(dirname $(pwd))

PROTO_PATH=$CURRENT_PATH
PHP_OUT=$PROJECT_PATH
GRPC_OUT=$PROJECT_PATH

GRPC_PLUGIN_PATH=/Users/lidanyang/Software/lib/grpc/bins/opt/grpc_php_plugin
PROTOC_PATH=/usr/local/protobuf/bin/protoc


for file in $PROTO_PATH/*
do
    if [ "${file##*.}" = "proto" ];
    then
        FILE_LIST=${FILE_LIST}" ${file}";
    fi
done

$PROTOC_PATH --proto_path=$PROTO_PATH --php_out=$PHP_OUT --grpc_out=$GRPC_OUT --plugin=protoc-gen-grpc=$GRPC_PLUGIN_PATH $FILE_LIST