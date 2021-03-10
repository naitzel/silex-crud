FROM node:12 as build

WORKDIR /bower

# Install Bower
RUN npm install -g bower

COPY bower.* ./

RUN bower install --allow-root

FROM nginx:alpine

WORKDIR /var/www/html/public

COPY --from=build /bower/bower_components lib