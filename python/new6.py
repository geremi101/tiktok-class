import numpy as np

# Function to calculate the grade based on marks
def calculate_grade(overall, exam, coursework):
    if overall >= 70 and exam >= 65 and coursework >= 65:
        return "Distinction"
    elif overall >= 60:
        return "Merit"
    elif 45 <= overall <= 59:
        return "Pass"
    else:
        return "Fail"

# Read input file name from user
try:
    input_file = input("Enter the name of the input file: ")

    # Read and process the file
    with open(input_file, 'r') as file:
        # Read the first line for number of students and coursework weighting
        first_line = file.readline().strip()
        num_students, coursework_weighting = map(float, first_line.split())
        coursework_weighting /= 100  # Convert percentage to decimal

        # Initialize the 2D NumPy array
        data_array = np.array([[0, 0.0, 0.0, 0.0]] * int(num_students))

        # Read student data
        for i, line in enumerate(file):
            reg_no, exam_mark, coursework_mark = map(float, line.split())
            overall_mark = (exam_mark * (1 - coursework_weighting) + 
                            coursework_mark * coursework_weighting)
            data_array[i] = [reg_no, exam_mark, coursework_mark, overall_mark]

    # Define named data type for the second array
    student_dtype = np.dtype([
        ('Registration', 'i4'),
        ('Exam', 'i4'),
        ('Coursework', 'i4'),
        ('Overall', 'i4'),
        ('Grade', 'U12')
    ])

    # Create the 1D array using the named data type
    result_array = np.array([(0, 0, 0, 0, '')] * int(num_students), dtype=student_dtype)

    # Populate the second array
    for i, row in enumerate(data_array):
        reg_no = int(row[0])
        exam_mark = round(row[1])
        coursework_mark = round(row[2])
        overall_mark = round(row[3])
        grade = calculate_grade(overall_mark, exam_mark, coursework_mark)
        result_array[i] = (reg_no, exam_mark, coursework_mark, overall_mark, grade)

    # Sort the second array by overall marks
    sorted_array = np.sort(result_array, order='Overall')

    # Write sorted array to output file
    output_file = "output.txt"
    with open(output_file, 'w') as f:
        for student in sorted_array:
            f.write(f"{student}\n")

    print(f"Results written to {output_file}")

    # Calculate classification statistics
    distinctions = np.sum(result_array['Grade'] == "Distinction")
    merits = np.sum(result_array['Grade'] == "Merit")
    passes = np.sum(result_array['Grade'] == "Pass")
    fails = np.sum(result_array['Grade'] == "Fail")

    # Print statistics to the console
    print(f"Distinctions: {distinctions}")
    print(f"Merits: {merits}")
    print(f"Passes: {passes}")
    print(f"Fails: {fails}")

    # Print registration numbers of failed students
    failed_students = result_array[result_array['Grade'] == "Fail"]
    print("Failed students (Registration Numbers):")
    for student in failed_students:
        print(student['Registration'])

except FileNotFoundError:
    print("Error: File not found. Please check the file name and try again.")
except OSError as e:
    print(f"I/O error occurred: {e}")
except Exception as e:
    print(f"An error occurred: {e}")
