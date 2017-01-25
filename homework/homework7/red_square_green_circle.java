import java.applet.*;
import java.awt.*;
import javax.swing.*;

public class red_square_green_circle extends JApplet{
	public void init(){
		String myShape = getParameter("shape").trim();
		String myColor = getParameter("color").trim();

		Container drawArea = getContentPane();
		DrawPanel myDrawPanel = new DrawPanel(myShape, myColor);
		drawArea.add(myDrawPanel);
	}

}

class DrawPanel extends JPanel{
	String myShape = "";
	String myColor = "";

	public DrawPanel(String shape, String color){
		super();
		myShape = shape;
		myColor = color;
	}

	public void paintComponent(Graphics grafObj){
		super.paintComponent(grafObj);
		grafObj.setColor(Color.red);
		grafObj.fillRect(0, 0, 100, 200);
		grafObj.setColor(Color.green);
		grafObj.fillOval(0, 300, 100, 100);



		if(myShape == null || myColor == null){
			grafObj.drawString("Parameter passing mistake.", 300, 300);
			return;
		}

		int red = Integer.parseInt(myColor.substring(0, 2), 16);
		int green = Integer.parseInt(myColor.substring(2, 4), 16);
		int blue = Integer.parseInt(myColor.substring(4, 6), 16);
		grafObj.setColor(new Color(red, green, blue));
		if(myShape.equals("Rect"))
			grafObj.fillRect(300, 300, 100, 200);
		else if(myShape.equals("Oval"))
			grafObj.fillOval(300, 300, 100, 200);
		else if(myShape.equals("RoundRect"))
			grafObj.fillRoundRect(300, 300, 100, 200, 30, 30);
		else if(myShape.equals("3DRect"))
			grafObj.fill3DRect(300, 300, 100, 200, true);
		else {
			grafObj.drawString("Such shape is not supported!", 300, 300);
		}
	}
}