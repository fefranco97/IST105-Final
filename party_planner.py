import sys
import json

party_items = [
    "Cake", "Balloons", "Music System", "Lights", "Catering Service",
    "DJ", "Photo Booth", "Tables", "Chairs", "Drinks",
    "Party Hats", "Streamers", "Invitation Cards", "Party Games", "Cleaning Service"
]

item_values = [20, 21, 10, 5, 8, 3, 15, 7, 12, 6, 9, 18, 4, 2, 11]

def calculate_base_code(selected_indices):
    selected_values = [item_values[i] for i in selected_indices]
    base_code = selected_values[0]
    for value in selected_values[1:]:
        base_code &= value
    return base_code, selected_values

def adjust_code(base_code):
    if base_code == 0:
        return base_code + 5, "Epic Party Incoming!"
    elif base_code > 5:
        return base_code - 2, "Let's keep it classy!"
    else:
        return base_code, "Chill vibes only!"

def main(): 
    if len(sys.argv) < 2:
        print(json.dumps({"error": "No items provided"}))
        sys.exit(1)
    try:
        selected_indices = [int(x) for x in sys.argv[1:] if 0 <= int(x) < len(party_items)]
    except ValueError:
        print(json.dumps({"error": "Invalid indices"}))
        sys.exit(1)

    if not selected_indices:
        print(json.dumps({"error": "No valid indices"}))
        sys.exit(1)

    selected_names = [party_items[i] for i in selected_indices]
    base_code, selected_values = calculate_base_code(selected_indices)
    final_code, message = adjust_code(base_code)

    response = {
        "selected_items": selected_names,
        "selected_values": selected_values,
        "base_code": base_code,
        "final_code": final_code,
        "message": message
    }

    print(json.dumps(response))

if __name__ == "__main__":
    main()
