FROM edyan/php:7.4-sqlsrv

RUN apt-get update -yqq \
    && apt-get install -y --no-install-recommends openssl php-mbstring php-xml php-bcmath\ 
    && sed -i 's,^\(MinProtocol[ ]*=\).*,\1'TLSv1.0',g' /etc/ssl/openssl.cnf \
    && sed -i 's,^\(CipherString[ ]*=\).*,\1'DEFAULT@SECLEVEL=1',g' /etc/ssl/openssl.cnf\
    && rm -rf /var/lib/apt/lists/*

# Uncomment to have mysqli extension installed and enabled
# RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
