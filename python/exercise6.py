#Exercise 6

import numpy as np

# Define grading function
def calculate_grade(overall_mark, exam_mark, coursework_mark):
    """
    Calculate the grade based on the overall mark, exam mark, and coursework mark.
    """
    if overall_mark >= 70 and exam_mark >= 65 and coursework_mark >= 65:
        return "Distinction"
    elif overall_mark >= 60:
        return "Merit"
    elif 45 <= overall_mark < 60:
        return "Pass"
    else:
        return "Fail"

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
                ("grade", "U12"),  # String for grade
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
            grade = calculate_grade(overall_mark, exam_mark, coursework_mark)
            student_records[i] = (reg_no, exam_mark, coursework_mark, overall_mark, grade)

        # Step 4: Sort the array by overall mark (descending)
        sorted_records = np.sort(student_records, order="overall_mark")[::-1]

        # Write the sorted array to a file
        output_file = "sorted_records.txt"
        with open(output_file, "w") as f:
            print(sorted_records, file=f)
        print(f"Sorted records saved to '{output_file}'.")

        # Step 5: Count grades and output fail details
        distinctions = np.sum(student_records["grade"] == "Distinction")
        merits = np.sum(student_records["grade"] == "Merit")
        passes = np.sum(student_records["grade"] == "Pass")
        fails = np.sum(student_records["grade"] == "Fail")

        print("\nGrade Distribution:")
        print(f"Distinctions: {distinctions}")
        print(f"Merits: {merits}")
        print(f"Passes: {passes}")
        print(f"Fails: {fails}")

        failed_students = student_records[student_records["grade"] == "Fail"]["reg_no"]
        print(f"\nRegistration numbers of failed students: {', '.join(map(str, failed_students))}")

    except FileNotFoundError:
        print(f"Error: The file '{file_name}' does not exist.")
    except ValueError:
        print("Error: Invalid file format or contents.")

# Run the program
if __name__ == "__main__":
    main()


