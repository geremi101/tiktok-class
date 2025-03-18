#Exercise 4

def filter_employees(employees, min_salary):
    """
    Filters and displays employees with a salary greater than or equal to min_salary.
    Outputs the results in a neatly formatted table, sorted by salary in descending order.

    :param employees: List of tuples containing (name, job, salary).
    :param min_salary: Integer, minimum salary threshold.
    """
    # Filter employees based on salary and sort by salary in descending order
    filtered = [emp for emp in employees if emp[2] >= min_salary]
    filtered.sort(key=lambda x: x[2], reverse=True)
    
    # Display results
    if filtered:
        print("\n{:<20} {:<20} {:<10}".format("Name", "Job", "Salary"))
        print("-" * 50)
        for name, job, salary in filtered:
            print(f"{name:<20} {job:<20} {salary:<10}")
    else:
        print(f"No employees found with a salary of {min_salary} or more.")

def main():
    # Step 1: Ask the user for a file name and attempt to open the file
    file_name = input("Enter the file name containing employee details: ")
    try:
        with open(file_name, "r") as file:
            employees = []
            for line in file:
                name, job, salary = line.strip().split(",")
                employees.append((name, job, int(salary)))  # Convert salary to int
    except FileNotFoundError:
        print(f"Error: Could not open file '{file_name}'. Please check the file name.")
        return

    # Step 2: Output the list of tuples
    print("\nEmployee list:")
    print(employees)

    # Step 3: Enter a loop to filter employees based on salary
    while True:
        try:
            salary_input = input("\nEnter a salary to filter employees (or 'quit' to exit): ")
            if salary_input.lower() == "quit":
                print("Exiting program.")
                break
            min_salary = int(salary_input)
            filter_employees(employees, min_salary)
        except ValueError:
            print("Invalid input. Please enter a valid integer for salary.")

# Run the program
if __name__ == "__main__":
    main()
