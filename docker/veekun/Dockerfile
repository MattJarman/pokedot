FROM python:3.8-slim as builder

RUN apt-get update && \
    apt-get install -y git \
    && git clone https://github.com/veekun/pokedex.git

WORKDIR pokedex

FROM python:3.8-slim

COPY --from=builder ./pokedex ./pokedex

WORKDIR pokedex

RUN pip3 install pymysql cryptography && \
    python setup.py develop

ENTRYPOINT ["pokedex"]
