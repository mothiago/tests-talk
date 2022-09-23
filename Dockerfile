FROM amazonlinux:2

RUN yum -y update; \
    yum clean all; \
    amazon-linux-extras install epel php8.0; \
    yum install -y \
        rsyslog \
        wget \
        which \
        php \
        git \
        php-{pear,pecl,cgi,common,curl,mbstring,gd,gettext,bcmath,json,xml,fpm,intl,zip,pgsql,pdo,soap,sodium} \
        postgresql-devel \
        httpd \
        supervisor; \
    yum clean all; \
    yum autoremove; \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer;

RUN yum -y update; \
    yum install -y yum-utils; \
    yum-config-manager --add-repo https://rpm.releases.hashicorp.com/AmazonLinux/hashicorp.repo; \
    yum -y install xorg-x11-server-Xvfb; \
    yum clean all; \
    yum autoremove;

RUN cd /opt; \
    wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox-0.12.6-1.amazonlinux2.x86_64.rpm; \
    yum install -y wkhtmltox-0.12.6-1.amazonlinux2.x86_64.rpm

ADD . /var/www
ADD .docker/usr/sbin/entrypoint /usr/sbin/entrypoint
ADD .docker/usr/sbin/entrypoint.local /usr/sbin/entrypoint.local
ADD .docker/usr/sbin/run-command /usr/sbin/run-command
ADD .docker/usr/sbin/update-application /usr/sbin/update-application
COPY .docker/etc /etc

RUN chmod -v +x /usr/sbin/entrypoint; \
    chmod -v +x /usr/sbin/entrypoint.local; \
    chmod -v +x /usr/sbin/update-application; \
    chmod -v +x /usr/sbin/run-command; \
    mkdir /var/www/storage/proxies; \
    chmod 777 /var/www/bootstrap -Rf; \
    chmod 777 /var/www/storage -Rf; \
    chown apache.apache /var/www -Rf;

WORKDIR /var/www

CMD [ "/usr/sbin/entrypoint" ]
