### Experimental Version 

### **Server Verification System**

1. This PHP application is designed to verify the integrity of blockchain files across multiple servers. The ServerController class includes methods for checking the status of servers, sending blockchain verification files, and performing blockchain integrity checks.
**Getting Started**

- Ensure that you have PHP installed on your machine.
- Set up the required configuration files:
- Create a file named server_list.json in the data directory with the list of servers, including their names, IP addresses, and ports.

```
{
    "servers": [
        {
            "name": "Server1",
            "ip": "192.168.1.1",
            "port": 8080
        },
        {
            "name": "Server2",
            "ip": "192.168.1.2",
            "port": 8080
        },
        // Add more servers as needed
    ]
}
```

- Run the application by accessing it through your web server or using PHP's built-in server.
`php -S localhost:8000 -t public`

- Open your browser and navigate to http://localhost:8000 to see the server and blockchain status.

**Features**

- Verify Blockchain Files: The verifyBlockchainFiles method checks the blockchain integrity on each server and communicates the verification status.
- Send Blockchain Verification: The sendBlockchainVerifyFile method sends the local blockchain verification file to a specified server.
- Send to Multiple Servers: The sendToMultipleServers method iterates through the server list, sends data to each server, and collects their status.
- Show Server Status: The showServerStatus method displays the status of each server and their blockchain synchronization status.
- Additional Notes
- Ensure that the data directory has the necessary write permissions for creating and updating blockchain verification files.
- Customize the views and templates in the app/Views directory according to your application's needs.

