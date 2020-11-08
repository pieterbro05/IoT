
const int TemperatuurPin = A0;
const int LichtPin = A1;
unsigned long long time;
const double k = 5.0/1024;
const double luxFactor = 500000;
const double R2 = 220;
const double LowLightLimit = 200; 
const double B = 1.3*pow(10.0,7);
const double m = -1.4;
unsigned long long vorigetijdT=0;
unsigned long long vorigetijdL=0;
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
  if(time-vorigetijdT>=5*60000)
  {
    vorigetijdT=time;
    Serial.print(1);
    Serial.println(temp);
   
  }
  if(time-vorigetijdL>=2*60000)
  {
    vorigetijdL=time;
    Serial.print(2);
    Serial.println(int(Light(analogRead(LichtPin))));
  }
}

 
