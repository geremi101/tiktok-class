#Exercise 3

def fun1(s):
    """
    Check if a string is a palindrome (case insensitive, spaces are significant).
    :param s: str
    :return: bool
    """
    return s == s[::-1]  # Reverse the string and compare to the original

def fun2(s):
    """
    Find the most frequent letter or digit in a string (case insensitive).
    Non-alphanumeric characters are ignored.
    :param s: str
    :return: str or None
    """
    from collections import Counter
    
    # Filter for alphanumeric characters and convert to lowercase
    filtered = [char.lower() for char in s if char.isalnum()]
    if not filtered:
        return None
    
    # Count occurrences of each character
    counts = Counter(filtered)
    return max(counts, key=counts.get)  # Return character with the highest frequency

def fun3(s):
    """
    Count the number of uppercase letters, lowercase letters, and spaces in a string.
    :param s: str
    :return: tuple(int, int, int)
    """
    upper_count = sum(1 for char in s if char.isupper())
    lower_count = sum(1 for char in s if char.islower())
    space_count = s.count(" ")
    return upper_count, lower_count, space_count
