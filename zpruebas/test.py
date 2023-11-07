from locust import HttpUser, between, task


class WebsiteUser(HttpUser):
    wait_time = between(5, 15)
    
    def on_start(self):
        self.client.post("/process/valilogin.php", {
            "email": "juan@gmail.com",
            "pass": "juan123"
        })
    
    @task
    def index(self):
        self.client.get("/main.php")
        # self.client.get("/static/assets.js")
        
    # @task
    # def about(self):
    #     self.client.get("/about/")