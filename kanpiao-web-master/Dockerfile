FROM php:8.1-apache

# 安装 mysqli 扩展
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# 开启 Apache rewrite 模块
RUN a2enmod rewrite

# 设置时区
RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
    && echo "Asia/Shanghai" > /etc/timezone

# 设置工作目录
WORKDIR /var/www/html

# 复制项目文件
COPY . /var/www/html/

# 配置 Apache 允许 .htaccess 覆盖（支持 URL 重写）
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# 设置目录权限
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
