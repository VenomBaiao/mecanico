FROM ubuntu:latest
LABEL authors="artaxerxes"

ENTRYPOINT ["top", "-b"]