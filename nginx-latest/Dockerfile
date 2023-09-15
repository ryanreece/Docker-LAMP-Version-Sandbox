# Use the official PHP image with Apache.
FROM nginx:latest

# Remove the default nginx.conf
RUN rm -f /etc/nginx/nginx.conf

# Copy the nginx.conf to /etc/nginx/
COPY nginx.conf /etc/nginx/

# Expose port 80 and 443 for the nginx server.
EXPOSE 80
EXPOSE 443

# Expose dev ports for nginx, phpmyadmin, and mysql
EXPOSE 8080
EXPOSE 8081
EXPOSE 8090
EXPOSE 8091
EXPOSE 3380
EXPOSE 3381