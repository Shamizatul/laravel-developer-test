# Use Node.js image
FROM node:18

# Set working directory
WORKDIR /app

# Copy Vue source code
COPY . .

# Install dependencies
RUN npm install

# Build the Vue project
RUN npm run build

# Expose port 8080
EXPOSE 8080

# Start the development server
CMD ["npm", "run", "serve"]
