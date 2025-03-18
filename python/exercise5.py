#Exercise 5

import numpy as np

# Define grading function
def calculate_grade(overall_mark):
    """
    Calculate the grade based on the overall mark.
    """
    if overall_mark >= 70:
        return "A"
    elif overall_mark >= 60:
        return "B"
    elif overall_mark >= 50:
        return "C"
    elif overall_mark >= 40:
        return "D"
    else:
        return "F"

# Main program
def main():
    try:
        # Step 1: Get file name from the user and open the file
        file_name = input("Enter the file name containing student marks: ")
        with open(file_name, "r") as file:
            # Read the first line to get the number of students and coursework weighting
            first_line = file.readline().strip()
            num_students, coursework_weighting = map(float, first_line.split())
            num_students = int(num_students)
            
            # Create the 2D array for student data
            student_data = np.array([[0, 0.0, 0.0, 0.0]] * num_students)

            # Read the remaining lines and populate the array
            for i, line in enumerate(file):
                reg_no, exam_mark, coursework_mark = line.strip().split()
                reg_no = int(reg_no)
                exam_mark = float(exam_mark)
                coursework_mark = float(coursework_mark)
                overall_mark = (exam_mark * (1 - coursework_weighting / 100)) + (
                    coursework_mark * (coursework_weighting / 100)
                )
                student_data[i] = [reg_no, exam_mark, coursework_mark, overall_mark]

        # Step 2: Define the named dtype
        dtype = np.dtype(
            [
                ("reg_no", int),
                ("exam_mark", int),
                ("coursework_mark", int),
                ("overall_mark", int),
                ("grade", "U1"),  # String of length 1 for grade
            ]
        )

        # Step 3: Create 1D array using the named dtype
        student_records = np.array(
            [(0, 0, 0, 0, "")] * num_students, dtype=dtype
        )

        # Populate the array with data from student_data
        for i, row in enumerate(student_data):
            reg_no = int(row[0])
            exam_mark = round(row[1])
            coursework_mark = round(row[2])
            overall_mark = round(row[3])
            grade = calculate_grade(overall_mark)
            student_records[i] = (reg_no, exam_mark, coursework_mark, overall_mark, grade)

        # Output the final array
        print("\nStudent Records:")
        for record in student_records:
            print(record)

    except FileNotFoundError:
        print(f"Error: The file '{file_name}' does not exist.")
    except ValueError:
        print("Error: Invalid file format or contents.")

# Run the program
if __name__ == "__main__":
    main()
