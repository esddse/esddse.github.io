package controllers;

import play.mvc.*;
import play.data.*;
import java.io.*;
import java.util.*;
import views.html.*;

/**
 * This controller contains an action to handle HTTP requests
 * to the application's home page.
 */
public class HomeController extends Controller {

    /**
     * An action that renders an HTML page with a welcome message.
     * The configuration in the <code>routes</code> file means that
     * this method will be called when the application receives a
     * <code>GET</code> request with a path of <code>/</code>.
     */
    public Result index() {
        return ok(good.render());
    }
    
    public Result record(Long id) {
        return ok("rocord:"+id.toString());
    }
    
    public Result somePost(){
        return ok("posted");
    }


    public Result form(){
        return ok(form.render());
    }
    
    
    public Result submit(){
        DynamicForm in = Form.form().bindFromRequest();
        String name = in.get("name");
        String age = in.get("age");
        String gender = in.get("gender");
        String e_mail = in.get("e_mail");
        try{
            BufferedWriter writer = new BufferedWriter(new FileWriter("/home/2016/y2016g166/apache/htdocs/homework/homework3/user_data.dat",true));
            writer.write("name="+name+", age="+age+", gender="+gender+", e-mail="+e_mail+"\n");
            writer.close();
        }catch(Exception e){
        
        }
        
        return ok("Thanks for participating in our survey!");
    }
    
    
    public Result show(){
        List<String> lines = new ArrayList<String>();
        try{
            BufferedReader reader = new BufferedReader(new FileReader("/home/2016/y2016g166/apache/htdocs/homework/homework3/user_data.dat"));
            String line = "a";
            while((line=reader.readLine().trim()) != null){
                lines.add(line);
            }
        }catch(Exception e){
            
        }
        return ok(show.render(lines));
    }
    
    public Result delete(){
        DynamicForm in = Form.form().bindFromRequest();
        String[] lines = in.get("todelete").split("&");
        
        List<String> datas = new ArrayList<String>();
        try{
            BufferedReader reader = new BufferedReader(new FileReader("/home/2016/y2016g166/apache/htdocs/homework/homework3/user_data.dat"));
            String line = "a";
            while((line=reader.readLine().trim()) != null){
                datas.add(line);
            }
        }catch(Exception e){
            
        }
        
        for(Iterator<String> it = datas.iterator(); it.hasNext();){
            String s = it.next();
            for(int i = 0; i < lines.length; i++)
                if(s.equals(lines[i]))
                    it.remove();
        }
        
        try{
            BufferedWriter writer = new BufferedWriter(new FileWriter("/home/2016/y2016g166/apache/htdocs/homework/homework3/user_data.dat"));
            for(String data : datas){
                writer.write(data+"\n");
            }
            writer.close();
        }catch(Exception e){
        
        }
        
        return ok(delete.render(datas));
    }
}
