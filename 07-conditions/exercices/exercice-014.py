import random

age = random.randrange(1,100)

message = 'Je suis '

if age >= 18:
    message + 'majeur'
else:
    message + 'mineur'

print(message)
