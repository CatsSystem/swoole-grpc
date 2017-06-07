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

