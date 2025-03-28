	
#Exercise 2

def is_prime(num):
    """Check if a number is a prime."""
    if num < 2:
        return False
    for i in range(2, int(num**0.5) + 1):
        if num % i == 0:
            return False
    return True

def non_primes_in_range(start, end):
    """Return a list of non-prime numbers between start and end (inclusive)."""
    return [n for n in range(start, end + 1) if not is_prime(n)]

def main():
    try:
        # Prompt user for two positive integers
        num1 = int(input("Enter the first positive integer: "))
        num2 = int(input("Enter the second positive integer: "))
        
        # Validate inputs
        if num1 <= 0 or num2 <= 0:
            print("Error: Both numbers must be positive integers.")
            return
        
        # Determine the range bounds
        start = min(num1, num2)
        end = max(num1, num2)
        
        # Get non-prime numbers in the range
        non_primes = non_primes_in_range(start, end)
        
        if non_primes:
            print("\nNon-prime numbers in the range:")
            # Print 8 numbers per line
            for i in range(0, len(non_primes), 8):
                print(" ".join(map(str, non_primes[i:i+8])))
        else:
            print("There are no non-prime numbers in the given range.")
    
    except ValueError:
        print("Error: Please enter valid integers.")

# Run the program
main()
