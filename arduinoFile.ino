bool get_data = false;
const int TemperatuurPin = A0;

const int LichtPin = A1;

void setup() {

Serial.begin(115200);

pinMode(TemperatuurPin, INPUT);

pinMode(LichtPin, INPUT);

}
void loop()
{
  
int temp = analogRead(TemperatuurPin);
temp = temp * 0.48828125;
Serial.print(temp);
Serial.println();
int licht = analogRead(LichtPin);

Serial.print(licht);
Serial.println();
delay(100);
  }

 
