#Exercise 1
from datetime import date

def calculate_age():
    today = date.today()
    
    # Propt user for date of birth
    dob_input = input("Enter  date of birth (dd/mm/yyyy): ")
    
    try:
        # Split & parse the input date
        day, month, year = map(int, dob_input.split('/'))
        dob = date(year, month, day)
        
        # Check  date is in the future
        if dob > today:
            print("Error: The date of birth cannot be in the future.")
            return
        
        # Calculate age
        age = today.year - dob.year
        if (today.month, today.day) < (dob.month, dob.day):
            age -= 1
        
        # Display apprpriate message based on age
        if age < 0:
            print("Error: Invalid date of birth.")
        elif age < 5:
            print(f"You are {age} years old. You're too young to use a computer.")
        else:
            print(f"You are {age} years old.")
    
    except ValueError:
        print("Error: Enter the date in the correct format (dd/mm/yyyy).")

# Call the function
calculate_age()

