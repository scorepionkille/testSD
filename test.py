def checkString(message):
    sum = {"UPPER":0,"LOWER":0}
    for x in message:
        if x.isupper():
            sum["UPPWER"]+=1
        elif x.islower():
            sum["LOWER"]+=1
        else:
            pass
    return sum


message = input(str("กรอกข้อความ :"))
en = checkString(message)
print()
