# Newsletter Subscription API for Nick

1. Clone the repository  
   ```bash
   https://github.com/rahixccr/newsletter-subscription.git
   ```

2. Install dependencies  
   ```bash
   composer i
   ```

3. Create `.env` file and configure database  

4. Run database migrations  
   ```bash
   php artisan migrate
   ```

5. Seed sites data  
   ```bash
   php artisan db:seed
   ```

6. Add php artisan schedule:run to cronjob  


7. Start the queue server  
   ```bash
   php artisan queue:work
   ```

8. start the main application  
   ```bash
   php artisan serve
   ```

9. Postman collection is included
