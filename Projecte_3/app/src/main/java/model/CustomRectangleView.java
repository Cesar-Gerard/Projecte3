package model;

import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.util.AttributeSet;
import android.view.View;

import androidx.annotation.Nullable;

public class CustomRectangleView extends View {
    // Variables para el IMC y los colores de los fragmentos
    private float imc;
    private int[] fragmentColors;
    private String[] fragmentNames;


    public static final int ORANGE = 0xFFFFA500;

    public CustomRectangleView(Context context) {
        super(context);
        init();
    }

    public CustomRectangleView(Context context, @Nullable AttributeSet attrs) {
        super(context, attrs);
        init();
    }

    public CustomRectangleView(Context context, @Nullable AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        init();
    }

    private void init() {
        // Inicializar el arreglo de colores de los fragmentos
        fragmentColors = new int[]{ ORANGE,Color.GREEN,Color.YELLOW,  Color.RED};
        fragmentNames = new String[]{"Peso\nInsuficient", "Pes Normal", "Sobrepes", "Obesitat"};
    }

    @Override
    protected void onDraw(Canvas canvas) {
        super.onDraw(canvas);

        // Obtener las dimensiones del rectángulo
        int width = getWidth();
        int height = getHeight();

        // Calcular las dimensiones de cada fragmento
        int fragmentWidth = width / 4;

        // Dibujar los fragmentos con los colores correspondientes
        for (int i = 0; i < 4; i++) {
            int fragmentLeft = i * fragmentWidth;
            int fragmentRight = (i + 1) * fragmentWidth;
            int color = fragmentColors[i];
            drawFragment(canvas, fragmentLeft, fragmentRight, color);
        }


        // Dibujar los nombres y valores IMC en cada fragmento
        for (int i = 0; i < 4; i++) {
            int fragmentLeft = i * fragmentWidth;
            int fragmentRight = (i + 1) * fragmentWidth;
            String name = fragmentNames[i];
            drawText(canvas, fragmentLeft, fragmentRight, name);
        }

        // Dibujar la línea o flecha según el IMC
        drawIMCIndicator(canvas, width);
    }

    private void drawFragment(Canvas canvas, int left, int right, int color) {
        Paint paint = new Paint();
        paint.setColor(color);
        canvas.drawRect(left, 0, right, getHeight(), paint);
    }

    private void drawText(Canvas canvas, int left, int right, String text) {
        Paint paint = new Paint();
        paint.setColor(Color.BLACK);
        paint.setTextSize(30f);
        paint.setTextAlign(Paint.Align.CENTER);

        float x = (left + right) / 2f;
        float y = 30f; // Ajusta la posición vertical negativa para que el texto esté por encima del rectángulo

        // Verificar si el texto contiene el carácter de salto de línea
        if (text.contains("\n")) {
            String[] lines = text.split("\n");
            float lineHeight = paint.getFontSpacing();

            // Dibujar cada línea de texto por separado
            for (int i = 0; i < lines.length; i++) {
                float lineY = y + (i * lineHeight);
                canvas.drawText(lines[i], x, lineY, paint);
            }
        } else {
            // Si no hay carácter de salto de línea, dibujar el texto normalmente
            canvas.drawText(text, x, y, paint);
        }
    }

    private void drawIMCIndicator(Canvas canvas, int width) {
        Paint paint = new Paint();
        paint.setColor(Color.BLACK);
        paint.setStrokeWidth(4f);
        paint.setStyle(Paint.Style.FILL_AND_STROKE);

        float indicatorX = width * (imc / 50f); // Ajustar el valor del IMC según tus necesidades
        canvas.drawLine(indicatorX, 0, indicatorX, getHeight(), paint);
    }

    public void setIMC(float imc) {
        this.imc = imc;
        invalidate(); // Volver a dibujar la vista
    }
}

