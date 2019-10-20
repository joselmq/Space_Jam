FROM nginx

RUN apt-get update && \
    apt-get install -y vim

COPY nginx.conf /etc/nginx/nginx.conf
# ADD default.conf /etc/nginx/sites-enabled/
ADD laravel.conf /etc/nginx/sites-enabled/

CMD ["nginx", "-g", "daemon off;"]