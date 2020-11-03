
const int TemperatuurPin = A0;
const int LichtPin = A1;
unsigned long time;
const double k = 5.0/1024;
const double luxFactor = 500000;
const double R2 = 220;
const double LowLightLimit = 200; 
const double B = 1.3*pow(10.0,7);
const double m = -1.4;

double Light (int RawADC0)
{
  double V2 = k*RawADC0;
    double R1 = (5.0/V2 - 1)*R2;
    double lux = B*pow(R1,m);
  return lux;
}
void setup() 
{
  Serial.begin(9600);
  pinMode(TemperatuurPin, INPUT);
  pinMode(LichtPin, INPUT);
}
void loop()
{
  time = millis();
  int temp = analogRead(TemperatuurPin);
  temp = temp * 0.48828125;
  if(time%60000*5==0)
  {
    Serial.print(1);
    Serial.println(temp);
   
  }
  if(time%60000*2==0)
  {
    Serial.print(0);
    Serial.println(int(Light(analogRead(LichtPin))));
  }
}
