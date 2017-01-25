import java.applet.*;
import java.awt.*;
import javax.swing.*;

public class hello extends JApplet{
	Container messageArea = getContentPane();
	MessagePanel myMessagePanel = new MessagePanel();
	public void init(){
		messageArea.add(myMessagePanel);
	}
}

class MessagePanel extends JPanel{
	public void paintComponent(Graphics grafObj){
		super.paintComponent(grafObj);
		grafObj.drawString("Hello World!", 50, 25);
	}
}