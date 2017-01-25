import java.applet.*;
import java.awt.*;
import javax.swing.*;

public class animation extends JApplet{
	Ball ball1;
	Ball ball2;

	public void init(){
		try{
			ball1 = new Ball(100, 130, 20, 20, "dd3344", this);
			ball2 = new Ball(400, 335, 20, 20, "887766", this);
		}catch(Exception e){
			e.printStackTrace();
		}		
	}	
}

class Ball extends Thread{
	int x,y;//position
	int dx, dy; // direction
	int width, height;
	int vx, vy;//velocity
	String color;
	protected animation anime;

	public Ball(int x, int y, int width, int height, String color, animation anime) throws Exception{
		this.anime = anime;
		this.dx = 1;
		this.dy = 2;
		this.x = x;
		this.y = y;
		this.width = width;
		this.height = height;
		this.vx = 1;
		this.vy = 1;
		this.color = color;
		paint(anime.getGraphics());

		this.start();
	}

	// one step
	public void step(){
		this.x += this.dx * this.vx;
		this.y += this.dy * this.vy;
	}

	public void check(){
		if(x < 0 || x+width > 800){
			dx = -dx;
		}
		if(y < 0 || y+height > 900){
			dy = -dy;
		}
		return;
	}

	public void paint(Graphics g){
		g.setColor(new Color(Integer.parseInt(color.substring(0, 2), 16), Integer.parseInt(color.substring(2, 4), 16), Integer.parseInt(color.substring(4, 6),16)));
		g.drawOval(x, y, width, height);
	}

	public void run(){
		Graphics g = anime.getGraphics();
		while(true){
			check();
			step();
			paint(g);
			try{
				this.sleep(2);
			}catch(Exception e){
				e.printStackTrace();
			}
		}
		
	}
}

