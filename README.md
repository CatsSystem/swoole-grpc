# swoole-grpc
Grpc Implement base on Swoole Http2 Server

# Document

# Require

* protobuf 3.3 +
* grpc 
* Swoole 1.9.9 +

# Install

## 安装Swoole扩展

需要开启Swoole扩展的http2和openssl支持

```bash
./configure --enable-async-redis --enable-http2 --enable-openssl
make clean && make && make install
```

# GRPC生成器

由于GRPC本身不支持PHP Server，因此原本的生成器也不支持生成Server端的代码。因此我修改了grpc php generator的代码，使用时，将grpc_generator目录下的文件复制到grpc的`src/compiler`目录下，然后重新编译安装即可。