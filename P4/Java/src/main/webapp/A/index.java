/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */
package A;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Usuario
 */
@WebServlet(name = "index", urlPatterns = {"/index"})
public class index extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");

        String codigoCatastral = request.getParameter("codigoCatastral");

        String tipoImpuesto = "Desconocido";

        if (codigoCatastral != null && !codigoCatastral.isEmpty()) {
            char primerDigito = codigoCatastral.charAt(0);
            switch (primerDigito) {
                case '1':
                    tipoImpuesto = "Alto";
                    break;
                case '2':
                    tipoImpuesto = "Medio";
                    break;
                case '3':
                    tipoImpuesto = "Bajo";
                    break;
                default:
                    tipoImpuesto = "No clasificado";
                    break;
            }
        }

        try (PrintWriter out = response.getWriter()) {
            out.println("<!DOCTYPE html>");
            out.println("<html lang='es'>");
            out.println("<head>");
            out.println("<meta charset='UTF-8'>");
            out.println("<meta name='viewport' content='width=device-width, initial-scale=1.0'>");
            out.println("<title>Resultado del Impuesto</title>");
            
            out.println("<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>");
            
            out.println("</head>");
            out.println("<body>");
            
            // Contenedor de Bootstrap
            out.println("<div class='container mt-5'>");
            out.println("<div class='card'>");
            out.println("<div class='card-header bg-primary text-white'>");
            out.println("<h2>Resultado del calculo de impuesto</h2>");
            out.println("</div>");
            out.println("<div class='card-body'>");
            
            out.println("<h4>Código Catastral: <span class='badge badge-info'>" + codigoCatastral + "</span></h4>");
            out.println("<p class='lead'>El tipo de impuesto calculado es: <strong>" + tipoImpuesto + "</strong></p>");
            
            //out.println("<a href='/Pregunta4/' class='btn btn-secondary mt-3'>Volver</a>");
            //out.println("<a href=' class='btn btn-secondary mt-3'>Volver</a>");
            out.println("<a href='http://localhost:8080/P4/index.php?ci=" + codigoCatastral + "' class='btn btn-secondary mt-3'>Volver</a>");

            
            out.println("</div>");
            out.println("</div>");
            out.println("</div>");
            
            // Incluye Bootstrap JS y dependencias
            out.println("<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>");
            out.println("<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js'></script>");
            out.println("<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>");
            
            out.println("</body>");
            out.println("</html>");
        }
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    public String getServletInfo() {
        return "Servlet que clasifica el tipo de impuesto basado en el código catastral";
    }
}
