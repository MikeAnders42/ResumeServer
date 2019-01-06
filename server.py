from BaseHTTPServer import HTTPServer, BaseHTTPRequestHandler
import ssl, logging

PORT = 8000

class RequestHandler(BaseHTTPRequestHandler):
    def do_GET(self):
        self.rfile._sock.settimeout(20)

        logging.info('Handling request for' self.path + ' from ' + self.client_address[0])

        if self.path =="/":
            self.path = "./content/Home.html"
        elif self.path != None and len(self.path) > 0 and self.path[1] == "/":
            self.path = "./content" + self.path
        else:
            self.path = "./content/" + self.path

        data = ""
        try:
            if "jpg" in self.path or "pdf" in self.path:
                f = open(self.path, "rb")
            else:
                f = open(self.path, "r")
            data = f.read()
        except Exception as e:
            self.send_error(404)
            return


        mimetype='text/html'
        if self.path.endswith(".jpg"):
            mimetype='image/jpg'
        if self.path.endswith(".js"):
            mimetype='application/javascript'
        if self.path.endswith(".css"):
            mimetype='text/css'
        if self.path.endswith(".pdf"):
            mimetype='application/pdf'
        
        self.send_response(200)
        self.send_header("Content-type", mimetype)
        self.end_headers()
        self.wfile.write(data)

        return

        

def run_serv(port=80):
    
    logging.basicConfig(filename='log.txt', level=logging.DEBUG)

    server_address = ('', port)
    server = HTTPServer(server_address, RequestHandler)
    server.socket = ssl.wrap_socket (server.socket, certfile='./server.pem', server_side=True)
    logging.info('Starting httpd')
    server.serve_forever()

if __name__ == "__main__":
    run_serv()